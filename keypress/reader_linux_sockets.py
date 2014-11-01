import socket
import sys
import time
from subprocess import call

s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)

#Conection info
host= '127.0.0.1'
port=int(2000)
s.bind((host,port))
s.listen(1)

#This function presses a key given by the argument "key"
def press(key):
    if key != 'speed':
        call(['xdotool key '+key], shell=True)
    else:
        call(['xdotool key --delay 1000 i '], shell=True)

while True:
    conn, addr = s.accept()
    print ('Connection address:', addr)
    while True:
        data=conn.recv(100000)
        data= data.decode("utf-8")
        if not data: break
        print(data)
        press(data)
    conn.close()
