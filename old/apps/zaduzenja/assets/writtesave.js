function refresh() {
initial();
initial2();
initial3();
document.getElementById("SaveAs").addEventListener('click', ()=>saveFile());
document.getElementById("OpenFile").addEventListener('click', ()=>getFileHandle());
}
async function getFileHandle() {
    const opts = {
      "types": [
        {
          description: 'Text Files',
          accept: {
            /* 'text/plain': ['.txt', '.text'], */
            'text/plain': ['.zad', '.zaduzenja']
          }
        }
      ]
    };
    fileHandle = await window.showOpenFilePicker(opts);
    const file = await fileHandle[0].getFile();
    const contents = await file.text();
    document.body.innerHTML = contents;
    setTimeout(refresh, 1000);
  }

  async function saveFile(fileHandle) {
    var a = document.body.innerHTML;
    const options = {
      types: [
        {
          description: 'Datoteka zaduženja',
          accept: {
            /* 'text/plain': ['.txt'], */
            'text/plain': ['.zad'],
          },
        },
      ],
    };
    if (!fileHandle) {
      fileHandle = await window.showSaveFilePicker(options);
    }
    const writable = await fileHandle.createWritable();

    await writable.write(a);
    //await writable.fileName
   
    await writable.close();
  }
