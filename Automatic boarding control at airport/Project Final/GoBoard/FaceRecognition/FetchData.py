import FacesTrain
import RecognizeFaces as rf
import mysql.connector
import cv2

mydb = mysql.connector.connect(host = 'localhost', user = 'root', passwd = '', database = 'test_db')
mycursor = mydb.cursor()

passport_id = rf.labels[rf.id_]

query = "select Name, Sex, Age, Flight_No, From_Loc, To_Loc, Date, Time, B_time, Gate, Seat_No from book where Passport_Id='"+passport_id+"'"

mycursor.execute(query)
result = mycursor.fetchone()

name = result[0]
sex = result[1]
age = result[2]
flight_no = result[3]
from_loc = result[4]
to_loc = result[5]
journey_date = result[6]
journey_time = result[7]
boarding_time = result[8]
gate = result[9]
seat_no = result[10]

seat_no = str(seat_no)
journey_date = journey_date.replace("-", "/")

# print("##############################################################################")
# print("NAME : ", name)
# print("SEX : ", sex)
# print("AGE : ", age)
# print("FLIGHT NO : ", flight_no)
# print("FLIGHT FROM : ", from_loc)
# print("FLIGHT TO : ", to_loc)
# print("DATE OF JOURNEY : ", journey_date)
# print("##############################################################################")

boarding_pass = cv2.imread('D:\\OpenCV Tutorial\\FaceRecognition\\BlankBoardingPass.jpeg', 0)

font =cv2.FONT_HERSHEY_COMPLEX_SMALL
boarding_pass = cv2.putText(boarding_pass, ""+name, (194,129), font, 0.80, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+from_loc, (117,179), font, 0.80, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+to_loc, (102,228), font, 0.80, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+journey_date, (263,245), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+journey_time, (363,245), font, 0.50, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+flight_no, (68,293), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+seat_no, (168,293), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+gate, (268,293), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+boarding_time, (364,293), font, 0.50, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+name, (573,145), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+from_loc, (573,185), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+to_loc, (573,220), font, 0.60, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+journey_date, (573,255), font, 0.40, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+journey_time, (633,255), font, 0.40, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+gate, (676,255), font, 0.40, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+flight_no, (570,289), font, 0.50, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+seat_no, (632,289), font, 0.50, (0,0,0), 1, cv2.LINE_AA)
boarding_pass = cv2.putText(boarding_pass, ""+boarding_time, (671,289), font, 0.50, (0,0,0), 1, cv2.LINE_AA)

cv2.imshow(''+name+'\'s Boarding Pass', boarding_pass)

cv2.waitKey(0)
cv2.destroyAllWindows()