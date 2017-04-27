var app = angular.module("myApp",[]);

app.controller('mainController', function($scope, $window) {
      //console.log('In mainController');
});

app.controller('encryptionController', function($scope, $window) {
      //console.log('In encrytionController');
      $scope.eprogress = 0;
      $scope.onChange = function(files){
         
         var file = files[0];
         //console.log('Encrypt: ' + file.name);
         //console.log('Key: ' + $scope.key);
         var worker = new Worker('aes-ctr-file-webworker.js');
         var reader = new FileReader();
         reader.onloadend = function () {
            var plaintext = this.result;
            console.log('original plaintext: ' + plaintext);
            worker.postMessage({
              op        :  'encrypt',
              fileName  :  file.name,
              plaintext :  plaintext,
              password  :  $scope.key
              
            });
         };

         reader.readAsDataURL(file);

         worker.onmessage = function (msg) {
            if (msg.data.progress != 'complete') {
               $scope.$apply(function(){
                  $scope.eprogress = msg.data.progress * 100;
               });
            }
            else if (msg.data.progress == 'complete') {
               $scope.$apply(function(){
                  $scope.eprogress = 0;
               });
               //console.log('Encryption Done!');
               //console.log('ciphertext: ' + msg.data.ciphertext);
               var blob = new dataURItoBlob(msg.data.ciphertext);
               saveAs(blob, msg.data.fileName + '.secret');            
            }
         }
      }
});

app.controller('decryptionController', function($scope, $window) {
      //console.log('In decrytionController');
      $scope.dprogress = 0;
      $scope.onChange = function(files){
         var file = files[0];
         //console.log('Decrypt: ' + file.name);
         //console.log('Key: ' + $scope.key);
         var worker = new Worker('aes-ctr-file-webworker.js');
         var reader = new FileReader();
         reader.onloadend = function () {
            var ciphertext = atob(this.result.split(',')[1]);
            //console.log('original ciphertext: '+ ciphertext);
            worker.postMessage({
              op        :  'decrypt',
              fileName  :  file.name,
              ciphertext:  ciphertext,
              password  :  $scope.key
              
            });
         };

         reader.readAsDataURL(file);
         
         worker.onmessage = function (msg) {
            if (msg.data.progress != 'complete') {
               $scope.$apply(function(){
                  $scope.dprogress = msg.data.progress * 100;
               });
            }
            else if (msg.data.progress == 'complete') {
               $scope.$apply(function(){
                  $scope.dprogress = 0;
               });
               //console.log('Decryption Done!');
               //console.log('decryted plaintext: '+ msg.data.plaintext);
               var blob = dataURItoBlob(atob(msg.data.plaintext.split(',')[1]));
               saveAs(blob, msg.data.fileName.replace(/\.secret$/,""));
            }
         }
      };
});

function dataURItoBlob(byteString) {
  var mimeString = "application/octet-stream";
  var ab = new ArrayBuffer(byteString.length);
  var ia = new Uint8Array(ab);
  for (var i = 0; i < byteString.length; i++) {
     ia[i] = byteString.charCodeAt(i);
  }

  var blob = new Blob([ab], {type: mimeString});
  return blob;
}

function rtrim(str) {
   for(var j=str.length-1; j>=0 && isWhitespace(str.charAt(j)) ; j--) ;
   return str.substring(0,j+1);
}