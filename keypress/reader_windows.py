import socket
import sys
import time
import win32api
import win32con

s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)

#Conection info
host= '127.0.0.1'
port=int(2000)
s.bind((host,port))
s.listen(1)

#This function presses a key given by the argument "key"
def press(key):
    win32api.keybd_event(key,0,0 ,0)
    time.sleep(.01)
    win32api.keybd_event(key,0,win32con.KEYEVENTF_KEYUP ,0)

while True:
    conn, addr = s.accept()
    print ('Connection address:', addr)
    while True:
        data=conn.recv(100000)
        data= data.decode("utf-8")
        if not data: break
        print(data)
        #KEYS:
        # m is start and s is select
        if data == 'a':
            press(0x41)
        elif data == 'b':
            press(0x42)
        elif data == 'up':
            press(0x26)
        elif data == 'down':
            press(0x28)
        elif data == 'right':
            press(0x27)
        elif data == 'left':
            press(0x25)
        elif data =='start':
            press(0x4D)
        elif data == 'select':
           press(0x53)
        elif data =='l':
            press(0x4C)
        elif data == 'r':
           press(0x52)
    conn.close()