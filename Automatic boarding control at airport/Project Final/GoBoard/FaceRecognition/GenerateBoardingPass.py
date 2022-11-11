# import FacesTrain
import cv2
import numpy as np
import pickle
import mysql.connector

mydb = mysql.connector.connect(host = 'localhost', user = 'root', passwd = '', database = 'test_db')
mycursor = mydb.cursor()
result = None

face_cascade = cv2.CascadeClassifier('C:\Python\Python37\Lib\site-packages\cv2\data\haarcascade_frontalface_default.xml')
recognizer = cv2.face.LBPHFaceRecognizer_create()
recognizer.read('trainer.yml')

labels = {}
with open("labels.pickle", 'rb') as f:
    og_labels = pickle.load(f)
    labels = {v:k for k,v in og_labels.items()}

cap = cv2.VideoCapture(0)

while(cap.isOpened()):
    _, frame = cap.read()
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    for (x, y, w, h) in faces:
        roi_gray = gray[y: y+h, x: x+w]
        roi_color = gray[y: y + h, x: x + w]

        id_, conf = recognizer.predict(roi_gray)
        if conf >= 45: # and conf <= 85:
            print(id_, labels[id_])
            passport_id = labels[id_]
            cv2.rectangle(frame, (x, y), (x + w, y + h), [0, 255, 0], 3)
            query = "select Name, Sex, Age, Flight_No, From_Loc, To_Loc, Date, Time, B_time, Gate, Seat_No from book where Passport_Id='" + passport_id + "'"
            mycursor.execute(query)
            result = mycursor.fetchone()

            if(result!=None):
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

                if cv2.waitKey(1) == ord('g'):
                    boarding_pass = cv2.imread('D:\\OpenCV Tutorial\\FaceRecognition\\BlankBoardingPass.jpeg', 0)
                    font = cv2.FONT_HERSHEY_COMPLEX_SMALL
                    boarding_pass = cv2.putText(boarding_pass, "" + name, (194, 129), font, 0.80, (0, 0, 0), 1, cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + from_loc, (117, 179), font, 0.80, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + to_loc, (102, 228), font, 0.80, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + journey_date, (263, 245), font, 0.60, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + journey_time, (363, 245), font, 0.50, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + flight_no, (68, 293), font, 0.60, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + seat_no, (168, 293), font, 0.60, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + gate, (268, 293), font, 0.60, (0, 0, 0), 1, cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + boarding_time, (364, 293), font, 0.50, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + name, (573, 145), font, 0.60, (0, 0, 0), 1, cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + from_loc, (573, 185), font, 0.60, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + to_loc, (573, 220), font, 0.60, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + journey_date, (573, 255), font, 0.40, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + journey_time, (633, 255), font, 0.40, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + gate, (676, 255), font, 0.40, (0, 0, 0), 1, cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + flight_no, (570, 289), font, 0.50, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + seat_no, (632, 289), font, 0.50, (0, 0, 0), 1,cv2.LINE_AA)
                    boarding_pass = cv2.putText(boarding_pass, "" + boarding_time, (671, 289), font, 0.50, (0, 0, 0), 1,cv2.LINE_AA)

                    cv2.imshow('' + name + '\'s Boarding Pass', boarding_pass)

                cv2.putText(frame, name, (x, y), cv2.FONT_HERSHEY_SIMPLEX, 1, [0,0,255], 2)
                result = None

    if cv2.waitKey(1) == ord('q'):
        break
    cv2.imshow("Frames", frame)

cap.release()
cv2.destroyAllWindows()