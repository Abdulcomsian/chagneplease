<?php

namespace App\Http\Controllers;
use Google\Cloud\Speech\V1p1beta1\RecognitionConfig\AudioEncoding;
use Google\Cloud\Speech\V1p1beta1\RecognitionConfig;
use Google\Cloud\Speech\V1p1beta1\StreamingRecognitionConfig;
use Google\Cloud\Speech\V1p1beta1\SpeechClient;
use Google\Cloud\Speech\V1p1beta1\RecognitionAudio;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTest()
    {
        return view('test');
    }

    public function testAudio(Request $request)
    {
        try {
            $speech = new SpeechClient([
                'credentials' => json_decode('
                {
                    "type": "service_account",
                    "project_id": "velvety-pagoda-388513",
                    "private_key_id": "38cb6cbca636f4d9413216298872a14174d9cb85",
                    "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC4U7tGUwlMyuEK\n04zt5IA5B2kwj08u8J/wfBZf7zpNEN9cPYm76dSzba35j01gULOYcH6FWsT3WDQD\ndOphumxeaPjqv4WZIGnLJsNC0zMu6pgfYLL2Po+N/kqoF/5+o8waG6O0LI15bZqq\nYGnU8wqgq6N7P4i8y8J2u6axqp8ck24LKCYdndmd3GdBlKO95zLZgrgdQnQzSF6o\ndqBd5Y573R1d6wWzZjJGPGm9emFPtVhKtltaCI85w8ydAI+R9IzZ6O5dpQNJGg3p\nvmXhchtRU/IkMLb91M6dnWTHHUvihlGkJ3DzzUtKjwlnX9U9zPmtGNpDe/7WVuuf\nHwq4aVRtAgMBAAECggEAVQm0HXaTlM0IU7FTlDDWAvlrSw7ijhpO/2iP/gRlFkbR\ndUGiuIHhMkJIgBjfrq6snIhRpn5A3offvzSCKUITWt7873gaT5HHnQSuErdTJrLu\nKZO4HKiyG+UUVkZzj8NLl0PnG2luf3XUZAQE70yNO6DT1Dl0gP1UIujht5eqvkhx\nhIsFkSsoEPiybxfkAazoT1IMhGS5A++UExCQSjOBwloP0ok57NfM3OnA9+uWvVZ9\nxuNKTHWgDWF0SZ6NJZdwokBS3VDyrbU+c29ui1TwSsp/fnMLCaL2KLq6gWaNOeLw\n6lynpeopKuomSX2CS7ODFoJBQu2ms7GLaPClnfwGlQKBgQDdZf/ZqezLjKlMHX+e\nD04Y4xqmVeQCRUKS3fUx3COAv153vKYldfY0vB22zRWYwHOSaSZytwMJ7ZVx8G0y\n/JSC/Q9jmhAIAvfLBQ6oz0AwU4LQExIrHffQqK5KUJuLN9sXjlD/MUAbHY5oUXI+\nmucHEB53eLc8aK6+RirLtspOJwKBgQDVIohFcItS787JFJoHkuc32WDqjCG3WF8o\nIp/zxWcVnstBSEnxmvDi2pxMsbdW8yyUPoms6aMWXwqRJErCUDqE8RYWsVzPuyYH\nHEgnQgEMrxnWPJ5GinTf/HZNdWfYwpQJlW4/0RUgFFGFdfrD0IL6h5iRiXAZ2xLx\n+y515qx5SwKBgQDLA5/zOMUA9W+8cwQ1rLUhTwZ95h6ZEmd0gwE2gjUv9ssqIpt7\nmEp2mtTobfBSzI5tf+wYnsazkN9LxnprmX6ZCnHVFE2E+yu7R1zk4H5skfdO014C\nmY1HEZYYYQfwRfyqAf81sjSlaJnQAHcw/xu/t0EorlHfm+I4aeEOQgQKWwKBgQCe\nrLnVMKeZFE3X6A2Qa+7V5nE/zRng3NrjD3wTyTgooXLi5EWgqOCDk4tfkcNT6XCb\n4T8wSzSOmC1Oxz0dEwuuI6p1NJBLWyJBku2oxHvxjH7ov3J6Q+QlSVht7GVmu93o\nkKZmvmtC2b2jZaVOmPKaP873MuIRbcbZ/k2lmxl2pwKBgQDOoU45X08lK1Yd7p6Y\nGXVrSty/Egubn3Y8HqFydG56WuRLhe6nDGfgeFBuE069ImwXXNoZyF5rem3lbSRR\nrF5kCYyaDBt9jTsp8L1gJzaQu2JziP3ibv1+lAQWdD65zOVqpftKHRzjVIggCjPl\nTfJzU+rpx7PBEG217olXTMyHmg==\n-----END PRIVATE KEY-----\n",
                    "client_email": "spark-mvp-abdul@velvety-pagoda-388513.iam.gserviceaccount.com",
                    "client_id": "118436824622871983246",
                    "auth_uri": "https://accounts.google.com/o/oauth2/auth",
                    "token_uri": "https://oauth2.googleapis.com/token",
                    "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
                    "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/spark-mvp-abdul%40velvety-pagoda-388513.iam.gserviceaccount.com",
                    "universe_domain": "googleapis.com"
                  }
                ', true),
            ]);



            
            $file = $request->file("audioFile");

            

            $recognitionConfig = new RecognitionConfig();
            $recognitionConfig->setEncoding(AudioEncoding::MP3);
            $recognitionConfig->setSampleRateHertz(22050);
            $recognitionConfig->setLanguageCode('en-US');
    
    
            $audioContent = file_get_contents($file);
            $audio = (new RecognitionAudio())->setContent($audioContent);
    
            $operation = $speech->longRunningRecognize($recognitionConfig, $audio);
             $operation->pollUntilComplete();
    
             if ($operation->operationSucceeded()) {
                $response = $operation->getResult();

                $transcript = '';
                foreach ($response->getResults() as $result) {
                    $transcript .= $result->getAlternatives()[0]->getTranscript() . ' ';
                }

                dd($transcript);

            } else {
                $error = $operation->getError();
            }
    
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function callback()
    {
        dd('here');
    }
}
