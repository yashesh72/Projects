import mysql.connector

mydb = mysql.connector.connect(host="localhost",user="root",passwd="",database="test_db")

mycursor = mydb.cursor()


query="select Name,Sex,Age,Flight_No,From_Loc,To_Loc,Date from book Where Passport_Id="
passportid = "'abc12345'"
query = query + passportid

mycursor.execute(query)

myresult = mycursor.fetchone()
"""
print("######################################################")
print("NAME:",myresult[0])
print("SEX:",myresult[1])
print("AGE:",myresult[2])
print("FLIGHT NUMBER:",myresult[3])
print("FROM :",myresult[4])
print("TO:",myresult[5])
print("DATE",myresult[6])
print("########################################################")
#for row in myresult:
 #   print(row)
"""