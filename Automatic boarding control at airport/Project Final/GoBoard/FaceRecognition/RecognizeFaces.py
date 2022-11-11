import cv2
import numpy as np
import pickle

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
            cv2.putText(frame, labels[id_], (x, y), cv2.FONT_HERSHEY_SIMPLEX, 1, [255,255,0], 2)

        cv2.rectangle(frame, (x, y), (x + w, y + h), [0, 255, 0], 3)

    cv2.imshow("Frames", frame)
    if cv2.waitKey(1) == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()