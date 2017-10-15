function search(list, val)
    left = 1
    right = #list
    while left <= right do
        mid = (left+right)//2
        if list[mid] == val then
            return true
        elseif list[mid] < val then
            left = mid + 1
        else
            right = mid - 1
		end
	end
	return false
end

list = {3,2,5,1,6,8,4,9}
print(search(list, 8))
print(search(list, 7))