importScripts('tea.js');

onmessage = function(msg) {
    var ob = msg.data;
    console.log('Recieved: ' + ob.fileName);
    switch (ob.op) {
        case 'encrypt':
            var ciphertext = Tea.encrypt(ob.plaintext, ob.password);
            self.postMessage({ progress: 'complete', fileName: ob.fileName, ciphertext: ciphertext });
            break;
        case 'decrypt':
            var plaintext = Tea.decrypt(ob.ciphertext, msg.data.password);
            self.postMessage({ progress: 'complete', fileName: ob.fileName, plaintext: plaintext });
            break;
    }
};
