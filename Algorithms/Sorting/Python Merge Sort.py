def sort(list,low,high):
    n = high - low
    if n <= 1:
        return
    mid = low + n/2

    sort(list,low, mid)
    sort(list,mid,high)
    temp = [None] * n
    i = low
    j = mid
    for k in range(n):
        if i == mid:
            temp[k] = list[j]
            j+=1
        elif j == high:
            temp[k] = list[i]
            i+=1
        elif list[j] < list[i]:
            temp[k] = list[j]
            j+=1
        else:
            temp[k] = list[i]
            i+=1
    for k in range(n):
        list[low + k] = temp[k]

# === MAIN PROGRAM ===

list = [3,5,2,7,8,6,4]
sort(list,0,len(list))
print list
