import cvlib as cv
from cvlib.object_detection import draw_bbox
import cv2
import requests

webcam = cv2.VideoCapture(0)
#각 웹캠별로 디바이스 이름을 다르게 설정합니다
dev_name='고유 디바이스 이름'

if not webcam.isOpened():
    print("Could not open webcam")
    exit()

while webcam.isOpened():

    status, frame = webcam.read()

    if not status:
        break

    bbox, label, conf = cv.detect_common_objects(frame)
    
    cnt=0
    for i in label:
        if i=='person':
            cnt+=1

    #아래 주소를 서버에 올려둔 pyconnect php파일의 주소로 등록합니다.
    response = requests.get('http://'+'서버이름'+'/pyconnect.php?dev='+dev_name+'&sto=1&ppl='+str(cnt)+'&drc=0')
    out = draw_bbox(frame, bbox, label, conf, write_conf=True)

    cv2.imshow("Real-time object detection", out)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

webcam.release()
cv2.destroyAllWindows() 


