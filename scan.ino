#include <BLEDevice.h>
#include <BLEUtils.h>
#include <BLEScan.h>
#include <BLEAdvertisedDevice.h>
#include <WiFi.h>
#include <HTTPClient.h>

class MyAdvertisedDeviceCallbacks: public BLEAdvertisedDeviceCallbacks {
    void onResult(BLEAdvertisedDevice advertisedDevice) {
      Serial.printf("Advertised Device: %s \n", advertisedDevice.toString().c_str());
      if(WiFi.status()== WL_CONNECTED){
      HTTPClient http;
      
      http.begin(F("http://서버이름/espPost.php?dev=Ce&sto=0"));
      int httpResponseCode = http.GET();
      String payload=http.getString();
      http.end();
      }
    else {
      Serial.println(F("WiFi Disconnected"));
    }
    }
};

void setup() {
  Serial.begin(115200);
  WiFi.begin("ssid", "wifi password");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
}

void loop() {
  BLEDevice::init("");
  BLEScan* pBLEScan = BLEDevice::getScan();
  pBLEScan->setAdvertisedDeviceCallbacks(new MyAdvertisedDeviceCallbacks());
  pBLEScan->setActiveScan(true);
  BLEScanResults foundDevices = pBLEScan->start(1);
  Serial.print(F("Devices found: "));
  delay(1000);
}
