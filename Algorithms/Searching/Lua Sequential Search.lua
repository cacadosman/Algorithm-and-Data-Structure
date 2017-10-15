function seqSearch(list,key)
    found = false
    for i,v in ipairs(list)do
        if v == key then
            found = true
		end
	end
    if found then
        return true
	end
    return false
end
	
list = {3,2,5,1,6,8,4,9}
print(seqSearch(list, 8))
print(seqSearch(list, 7))