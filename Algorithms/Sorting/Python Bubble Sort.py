def sort(list):
    max = len(list)
    for i in range(1,max):
        for j in range(0,max-i):
            if list[j] > list[j+1]:
                list[j], list[j+1] = list[j+1], list[j]

list = [3,5,2,7,8,6,4]
sort(list)
print list
