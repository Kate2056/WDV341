#!"C:\Program Files\python.exe"
print("Content-Type: text/html\n\n")
import cgi, cgitb

form = cgi.FieldStorage()

inFirstName = form["firstName"].value
inLastName = form["lastName"].value
inSchool = form["school"].value

print("First Name: " + inFirstName)
print("<br>")
print("Last Name: " + inLastName)
print("<br>")
print("School: " + inSchool)
