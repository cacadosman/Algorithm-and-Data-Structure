class Heap:
    n = None;

    def create(self,list):
        self.n = len(list)-1
        for i in range(self.n/2,-1,-1):
            self.heap(list, i)

    def heap(self,list, i):
        left = 2*i
        right = 2*i + 1
        max = i
        if left <= self.n and list[left] > list[i]:
            max = left
        if right <= self.n and list[right] > list[max]:
            max = right
        if max != i:
            self.swap(list,i,max)
            self.heap(list, max)

    def swap(self,list,i,j):
        tmp = list[i]
        list[i] = list[j]
        list[j] = tmp

# === MAIN PROGRAM ===

list = [10,50,20,60,100,30,70,40,50]

heap = Heap()
heap.create(list)

print list
