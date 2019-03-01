# UDPPingClient.py
#Mytchell Beaton & David Espiritu
#cst311 section 01
#Programming Assignment 1 UDP_Pinger
#Mar. 03, 2019

import random
from socket import *
serverSocket = socket(AF_INET, SOCK_DGRAM)
serverSocket.bind(('', 12000))
print('The server is ready to receive on port number: 12000')

while True:

    rand=random.randint(0, 10)
    message,address = serverSocket.recvfrom(1024)
    message = message.upper()
    start = serverTime.recvfrom(1024)
    print('Responding from server to ping request with sequence number '+message.decode('utf-8')+'Timestamp: ')
    if rand < 4:
        print('Message with sequence number '+ message.decode('utf-8') +' dropped')
        continue

    serverSocket.sendto(message, address)