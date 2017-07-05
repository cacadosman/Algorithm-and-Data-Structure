#Author : Fadli Maulana (cacadosman)

class Node:
    data = None
    next = None

    def __init__(self, data):
        self.data = data

class LinkedList:
    head = None
    tail = None

    def isEmpty(self):
        return self.head == None

    # Insert node at the beginning of the list.
    def addFirst(self, data):
        input = Node(data)
        if self.isEmpty():
            self.head = input
            self.tail = input
        else:
            input.next = self.head
            self.head = input

    # Insert node at the end of the list.
    def addLast(self, data):
        input = Node(data)
        if self.isEmpty():
            self.head = input
            self.tail = input
        else:
            self.tail.next = input
            self.tail = input

    # Insert node after the node that matches the query.
    def insertAfter(self, key, data):
        input = Node(data)
        temp = self.head
        while temp != None:
            if temp.data == key:
                input.next = temp.next
                temp.next = input
                break;
            temp = temp.next

    # Insert node before the node that matches the query.
    def insertBefore(self, key, data):
        input = Node(data)
        temp = self.head
        while temp != None:
            if temp.data == key and temp == self.head:
                self.addFirst(input)
                break;
            elif temp.next.data == key:
                input.next = temp.next
                temp.next = input
                break;
            temp = temp.next

    # Delete the first node in the list.
    def removeFirst(self):
        if not self.isEmpty():
            if self.head == self.tail:
                self.head = self.tail = None
            else:
                self.head = self.head.next

    # Delete the last node in the list.
    def removeLast(self):
        temp = self.head
        if not self.isEmpty():
            if self.head == self.tail:
                self.head = self.tail = None
            else:
                while temp.next != self.tail:
                    temp = temp.next
                temp.next = None
                self.tail = temp

    # Delete the node that matches the query.
    def remove(self, key):
        temp = self.head
        if not self.isEmpty():
            while temp.next != None:
                if temp.next.data == key:
                    temp.next = temp.next.next
                    break;
                elif temp.data == key and temp == self.head:
                    self.removeFirst()
                    break
                temp = temp.next

    # find the node that matches the query.
    def find(self, key):
        found = False
        temp = self.head
        while temp != None:
            if temp.data == key:
                found = True
                break;
            temp = temp.next
        if found:
            return True
        else:
            return False

    # print all element in the list
    def printAll(self):
        list = []
        temp = self.head
        while temp != None:
            list.append(temp.data)
            temp = temp.next
        print ' '.join(str(e) for e in list)

    # get the nth element in the list.
    def get(self, index):
        temp = self.head
        for i in range(0, index):
            if temp.next == None:
                temp.data = ""
                break;
            temp = temp.next
        return temp.data

# === MAIN PROGRAM ===

link = LinkedList()
link.addFirst(10)
link.addFirst(20)
link.addFirst(45)
link.addLast(30)
link.insertAfter(10,50)
link.insertBefore(50,25)
link.removeFirst()
link.removeLast()
link.remove(23)
link.printAll()
print link.get(2)
