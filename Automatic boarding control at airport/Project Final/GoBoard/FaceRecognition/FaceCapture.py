import cv2

cap = cv2.VideoCapture(0)
i = 1
while(cap.isOpened()):
    _, frame = cap.read()
    cv2.imshow('Frame', frame)

    key = cv2.waitKey(1)

    if key == ord('q'):
        break

    elif key == ord('s'):
        cv2.imwrite('D:\\OpenCV Tutorial\\FaceRecognition\\Images\\U1508199\\'+str(i)+'.jpg', frame)
        i += 1

cap.release()
cv2.destroyAllWindows()
