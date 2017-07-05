class Queue:
    queue = []
    front = 0
    rear = -1
    n = 0

    def enqueue(self, data):
        self.queue.append(data)
        self.n += 1

    def dequeue(self):
        if self.n > 0:
            temp = self.queue.pop()
            self.n -= 1
            return temp
        return ""

    def isEmpty(self):
        return self.n

# === MAIN PROGRAM ===

queue = Queue()
queue.enqueue(10)
queue.enqueue(20)
print queue.dequeue()
print queue.dequeue()
queue.enqueue(30)
queue.enqueue(40)
print queue.dequeue()
print queue.dequeue()
