import random

def search(list, val):
    left = 0
    right = len(list)-1
    while left <= right:
        mid = (left+right)/2
        if list[mid] == val:
            return True
        elif list[mid] < val:
            left = mid + 1
        else:
            right = mid - 1
    return False

list = [3,2,5,1,6,8,4,9]
print search(list, 8)
print search(list, 7)
