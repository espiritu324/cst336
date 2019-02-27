# UDPPingClient.py
#Mytchell Beaton & David Espiritu
#cst311 section 01
#Programming Assignment 1 UDP_Pinger
#Mar. 03, 2019

import socket
from socket import AF_INET, SOCK_DGRAM
import time

IP_ADDRESS = ""
UDP_portNum = 12000

clientSocket = socket.socket(AF_INET,SOCK_DGRAM) 
clientSocket.settimeout(1) #set timeout to 1 sec
clientTime = socket.socket(AF_INET,SOCK_DGRAM) 
clientTime.settimeout(1) #set timeout to 1 sec

sequence_num = 1 #keeps track of number of packets
RTT =[] #keeps track of Round Trip Time for each packet
#only prints 10 packets
while sequence_num<=10:
    start=str(time.time())
    message = str(sequence_num)
    clientSocket.sendto(message.encode('utf-8'),(IP_ADDRESS, UDP_portNum))
    clientTime.sendto(start.encode('utf-8'))
    EstimateRTT = 0
    i = 0

    try:
        message, address = clientSocket.recvfrom(1024)
        elapsedTime = (time.time()-start)
        RTT.append(elapsedTime)
        EstimateRTT = .875*EstimateRTT + .125*RTT[i]
        print( 'Ping message number '+str(sequence_num)+' RTT:' + str(elapsedTime) + ' secs')
        i+=1
        
    except socket.timeout:      #detect if packet is dropped and prints seq num of dropped packet
        print( 'Ping message number '+str(sequence_num)+' timed out')   
        

    sequence_num+=1

    print( '')
    
    if sequence_num > 10:

        print('Number of packets sent:',sequence_num-1)
        print('Number of packets received:',len(RTT))
        
        LossRate = str((10-len(RTT))*10)
        
        print( 'Packet loss rate is:' + LossRate + ' %')    #print packet loss
        
        mean = sum(RTT, 0.0)/ len(RTT)
        
        print( 'Maximum RTT is:' + str(max(RTT)) + ' seconds')  #print max RTT
        print( 'MinimumRTT is:' + str(min(RTT)) + ' seconds')   #print min RTT
        print( 'Average RTT is:' + str(mean)+ ' seconds')       #print average RTT
        print( 'Estimated RTT: '+ str(EstimateRTT) + ' secs')   #print Estimate RTT

        clientSocket.close()