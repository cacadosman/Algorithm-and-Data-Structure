def sort(list,left,right):
    i = left
    j = right
    pivot = list[(left+right)/2]

    while i <= j:
        while list[i] < pivot:
            i += 1
        while list[j] > pivot:
            j -= 1
        if i <= j:
            tmp = list[i]
            list[i] = list[j]
            list[j] = tmp
            i += 1
            j -= 1

    if left < j:
        sort(list, left, j)
    if i < right:
        sort(list, i, right)

list = [3,5,2,7,8,6,4]
sort(list,0,len(list)-1)
print list
