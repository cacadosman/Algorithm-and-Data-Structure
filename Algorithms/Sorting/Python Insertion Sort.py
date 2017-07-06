def sort(list):
    max = len(list)
    for i in range(1,max):
        j = i-1
        a = list[i]
        while j >= 0 and list[j] > a:
            list[j+1] = list[j]
            j -= 1
        list[j+1] = a

list = [3,5,2,7,8,6,4]
sort(list)
print list
