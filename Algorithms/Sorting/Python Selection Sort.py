def sort(list):
    max = len(list)
    for i in range(max):
        min = i
        for j in range(i+1, max):
            if list[min] > list[j]:
                min = j
        list[i], list[min] = list[min], list[i]

list = [3,5,2,7,8,6,4]
sort(list)
print list
