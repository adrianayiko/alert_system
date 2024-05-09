#include <SoftwareSerial.h>
int blue = 9; //This is the Button
//Create software serial object to communicate with SIM900
SoftwareSerial mySerial(3, 2); //SIM900 tx and rx
SoftwareSerial esp(5, 4);// WI-FI MODULE RX3, TX2
String uri_short = "/EMPLOYEE/post/hardware.php?data=1";
String uri;
int bedno;
int roomno;

void setup()
{
  pinMode(9, INPUT_PULLUP);
  //Begin serial communication with Arduino and Arduino IDE (Serial Monitor)
  Serial.begin(9600);
  
  //Begin serial communication with Arduino and SIM900
  mySerial.begin(9600);

  Serial.println("Initializing..."); 
  esp.begin(9600);
  Serial.begin(9600);
  connectWifi();
  delay(1000);
 
  
}


void loop()
{
   int state = digitalRead(blue);
  Serial.println(state);
  
  if (state == LOW){
      wireless();
      delay(3000);
      sendSms();
//      delay(2000);
//      call();
    
  }
//    delay(1000);
// if (state == LOW){
//  sendSms();
// }
//;
}

void wireless(){
  bedno= 20;
  roomno=100;
    uri = uri_short +"&bedno="+bedno +"&roomno="+ roomno;
    Serial.println(uri);
    httppost ();
}

void call(){
   mySerial.println("AT"); //Once the handshake test is successful, i t will back to OK
  updateSerial();
  
 mySerial.println("ATD+ +256753203261;"); //  change ZZ with country code and xxxxxxxxxxx with phone number to dial
  updateSerial();
  delay(20000); // wait for 20 seconds...
  mySerial.println("ATH"); //hang up
  updateSerial();
 
}
void sendSms(){
   mySerial.println("AT"); //Handshaking with SIM900
  updateSerial();

  mySerial.println("AT+CMGF=1"); // Configuring TEXT mode
  updateSerial();
 mySerial.println("AT+CMGS=\"+256773571839\",\"+256784612686\"");
 updateSerial();
  mySerial.println("ALERT MEDICAL EMERGENCY !!"); //text content
  mySerial.println("Attend to Patient in :");
  mySerial.print("Room Number: ");
  mySerial.println(roomno);
  mySerial.print("Bed Number: ");
  mySerial.println(bedno);
  
  
  updateSerial();
  mySerial.write(26);
}
void updateSerial()
{
  delay(500);
  while (Serial.available()) 
  {
    mySerial.write(Serial.read());//Forward what Serial received to Software Serial Port
  }
  while(mySerial.available()) 
  {
    Serial.write(mySerial.read());//Forward what Software Serial received to Serial Port
  }
}
void connectWifi() {
String ssid ="";
String password="";

    Serial.println("Trying to connect");
    esp.println("AT+CWMODE=3");
    delay(100);
    String cmd = "AT+CWJAP=\"" +ssid+"\",\"" + password + "\"";
    esp.println(cmd);
    esp.println("AT");
    String inData = esp.readStringUntil('\r');
    Serial.println("Got reponse from ESP8266: " + inData);
    
    delay(4000);
    if(esp.find("OK")) { Serial.println("Connected!");
  
    }
    else {

   // connectWifi();
      Serial.println("Cannot connect to wifi"); 
}

}
void httppost () {
  String data;
 
String server ="192.168.4.2";  //ip adress replace with www.sostechmakers.com
  Serial.println("Starting Conn");
  esp.println("AT+CIPSTART=\"TCP\",\"" + server + "\",80");//start a TCP connection.
  
  if( esp.find("OK")) {
  
    Serial.println("TCP connection ready");
  } 
  
  delay(1000);
  
  String postRequest =
  
 "POST " + uri +
 " HTTP/1.0\r\n" +
  
  "Host: " + server + "\r\n" + 
 "Accept: *" + "/" + "*\r\n" +
 
  "Content-Length: " + data.length() + "\r\n" +
  "Content-Type: application/x-www-form-urlencoded\r\n" +
  
  "\r\n" + data;
  
  String sendCmd = "AT+CIPSEND=";//determine the number of caracters to be sent.
  
  esp.print(sendCmd);
  
  esp.println(postRequest.length() );
  
  delay(500);
  
  if(esp.find(">")) {
    Serial.println("Sending.."); 
    esp.print(postRequest);
  
  if( esp.find("SEND OK")) {
    Serial.println("Packet sent");
  
  while (esp.available()) {
  
    String tmpResp = esp.readString();
    Serial.println("tmpResp=");
    
    Serial.println(tmpResp);

    

  }
  
  esp.println("AT+CIPCLOSE"); // close the connection
  
  }
}
}
