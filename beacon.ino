#include "BluetoothSerial.h"
#include <TFT_eSPI.h>
BluetoothSerial SerialBT;

void setup() {
  Serial.begin(115200);
  SerialBT.begin("KSAelevator");
}

String readSerial(){
  String str="";
  char c;
  while(SerialBT.available()){
    c=SerialBT.read();
    str.concat(ch);
    delay(5);
  }
  return str;
}

void loop() {
  String data;
  if (Serial.available()){
    SerialBT.write(Serial.read());
  }

  if (SerialBT.available()){
    serial=readSerial();
    tft.fillRect(150,80,180,40,TFT_BLACK);
    tft.drawString(serial,240,105,GFXFF);
  }
  delay(100);
}
