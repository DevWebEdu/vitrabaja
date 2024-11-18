import fs from 'node:fs'

fs.readFile('a.txt', 'utf-8', (err,data) => {
    if (err){
        console.log ('error : ', err );
        return
    }else {
       
        data = data.slice(0, -1)
        data = data.replace('\r\n','')
        data = data.split('|')
        console.log(data)
    }
} )

