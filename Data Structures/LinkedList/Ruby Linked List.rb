class Node
  attr_accessor :data,:next

  def initialize(data)
    @data = data
  end
end

class LinkedList
  @@head = nil
  @@tail = nil

  def isEmpty()
    @@head == nil
  end

  def addFirst(data)
    @input = Node.new(data)
    if isEmpty()
      @@head = @input
      @@tail = @input
    else
      @input.next = @@head
      @@head = @input
    end
  end

  def addLast(data)
    @input = Node.new(data)
    if isEmpty()
      @@head = @input
      @@tail = @input
    else
      @@tail.next = @input
      @@tail = @input
    end
  end

  def insertAfter(key, data)
    @input = Node.new(data)
    @temp = @@head
    while @temp != nil
      if @temp.data == key
        @input.next = @temp.next
        @temp.next = @input
        break
      end
      @temp = @temp.next
    end
  end

  def insertBefore(key, data)
    @input = Node.new(data)
    @temp = @@head
    while @temp != nil
      if @temp.data == key && @temp == @@head
        addFirst(@input)
        break
      elsif @temp.next.data == key
        @input.next = @temp.next
        @temp.next = @input
        break
      end
      @temp = @temp.next
    end
  end

  def removeFirst()
    if !isEmpty()
      if @@tail == @@head
        @@head = @@tail = nil
      else
        @@head = @@head.next
      end
    end
  end

  def removeLast()
    @temp = @@head
    if !isEmpty()
      if @@tail == @@head
        @@head = @@tail = nil
      else
        while @temp.next != @@tail
          @temp = @temp.next
        end
        @temp.next = nil
        @@tail = @temp
      end
    end
  end

  def remove(key)
    @temp = @@head
    if !isEmpty()
      while @temp != nil
        if @temp.data == key && @temp == @@head
          removeFirst()
          break
        elsif @temp.next == nil
          break
        elsif @temp.next.data == key
          @temp.next = @temp.next.next
          break;
        end
        @temp = @temp.next
      end
    end
  end

  def find(key)
    @found = false
    @temp = @@head
    while @temp != nil
      if @temp.data == key
        @found = true
        break
      end
      @temp = @temp.next
    end
      if @found
        true
      else
        false
      end
  end

  def printAll()
    @temp = @@head
    while @temp != nil
      print "#{@temp.data} "
      @temp = @temp.next
    end
  end

  def get(index)
    @temp = @@head
    @index = index+1
    @index.times do
      if @temp == nil
        @val = nil
        break
      end
      @val = @temp.data
      @temp = @temp.next
    end
    @val
  end

end

# === MAIN PROGRAM ===

link = LinkedList.new()
link.addFirst(10)
link.addFirst(20)
link.addLast(30)
link.insertAfter(10,40)
link.insertBefore(10,50)
link.removeFirst()
link.removeLast()
link.remove(10)
link.printAll()
print "\n#{link.get(1)}"
