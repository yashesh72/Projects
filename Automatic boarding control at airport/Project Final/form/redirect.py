import fetch_data
from tkinter import *
#exec ('fetch-data.py')

NAME=fetch_data.myresult[0]
SEX=fetch_data.myresult[1]
AGE=fetch_data.myresult[2]
FLIGHT_NO=fetch_data.myresult[3]
FROM=fetch_data.myresult[4]
TO=fetch_data.myresult[5]
DATE=fetch_data.myresult[6]

#from tkinter import *

root = Tk()
root.geometry('500x700')
root.title("GoBoard")

label_0 = Label(root, text="Boarding pass",width=20,font=("bold", 20))
label_0.place(x=90,y=53)


label_1 = Label(root, text="FullName",width=20,font=("bold", 10))
label_1.place(x=80,y=130)

entry_text1 = StringVar()
entry_1 = Entry(root, textvariable=entry_text1)
entry_1.place(x=240,y=130)
entry_text1.set(NAME)

label_2 = Label(root, text="Gender",width=20,font=("bold", 10))
label_2.place(x=80,y=180)

entry_text2 = StringVar()
entry_2 = Entry(root, textvariable=entry_text2)
entry_2.place(x=240,y=180)
entry_text2.set(SEX)

label_3 = Label(root, text="Age",width=20,font=("bold", 10))
label_3.place(x=80,y=230)

entry_text3 = StringVar()
entry_3 = Entry(root, textvariable=entry_text3)
entry_3.place(x=240,y=230)
entry_text3.set(AGE)

label_4 = Label(root, text="Flight Number",width=20,font=("bold", 10))
label_4.place(x=80,y=280)

entry_text4 = StringVar()
entry_4 = Entry(root, textvariable=entry_text4)
entry_4.place(x=240,y=280)
entry_text4.set(FLIGHT_NO)

label_5 = Label(root, text="From",width=20,font=("bold", 10))
label_5.place(x=80,y=330)

entry_text5 = StringVar()
entry_5 = Entry(root, textvariable=entry_text5)
entry_5.place(x=240,y=330)
entry_text5.set(FROM)

label_6 = Label(root, text="To",width=20,font=("bold", 10))
label_6.place(x=80,y=380)

entry_text6 = StringVar()
entry_6 = Entry(root, textvariable=entry_text6)
entry_6.place(x=240,y=380)
entry_text6.set(TO)

label_7 = Label(root, text="Date",width=20,font=("bold", 10))
label_7.place(x=80,y=430)

entry_text7 = StringVar()
entry_7 = Entry(root, textvariable=entry_text7)
entry_7.place(x=240,y=430)
entry_text7.set(DATE)


Button(root, text='Confirm',width=20,bg='brown',fg='white').place(x=180,y=480)

root.mainloop()
