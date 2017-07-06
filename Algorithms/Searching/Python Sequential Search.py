def seqSearch(list,key):
    max = len(list)
    found = False
    for i in range(0,max):
        if list[i] == key:
            found = True
    if found:
        return True
    return False

list = [3,2,5,1,6,8,4,9]
print seqSearch(list, 8)
print seqSearch(list, 7)
