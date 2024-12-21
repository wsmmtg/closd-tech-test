SELECT vendor.GroupID, vendor.CompanyName, COUNT(joinVendor.GroupID) AS groupCount
FROM cb_vendorinformation vendor JOIN cb_vendorinformation joinVendor ON vendor.GroupID = joinVendor.GroupID
GROUP BY vendor.GroupID, vendor.CompanyName
ORDER BY groupCount DESC, vendor.GroupID;