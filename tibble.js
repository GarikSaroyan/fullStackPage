let tibbleBox = document.getElementById('tibbleBox')

 async function getTibbleData() {
    try {
        const response = await fetch('http://php/PhpstormProjects/createSite/DB/tibbleData.php');
        const data = await response.json();

        let countryArr = data[0]
        let regionArr = data[1]
        let cityArr = data[2]


        let arr = []
        let cou = ''
        for (let i = 0; i < countryArr.length; i++) {
            let reg = ''
            for (let j = 0; j < regionArr.length; j++) {
                for (let z = 0; z < cityArr.length; z++) {

                    let arrAdd = []

                    if (arr.length === 0 || cou !== countryArr[i].country) {
                        arrAdd.push(countryArr[i].country)
                        cou = countryArr[i].country
                    } else {
                        arrAdd.push('-')
                    }

                    if (countryArr[i].id === regionArr[j].countryId && reg !== regionArr[j].region) {
                        arrAdd.push(regionArr[j].region)
                        reg = regionArr[j].region
                    } else {
                        arrAdd.push('-')
                    }


                    if (regionArr[j].regionId === cityArr[z].regionId && countryArr[i].id === regionArr[j].countryId) {
                        arrAdd.push(cityArr[z].city)

                    } else {
                        arrAdd.push('-')
                    }

                    if (arrAdd[0].length > 1 || arrAdd[1].length > 1 || arrAdd[2].length > 1) {
                        arr.push(arrAdd)
                        // console.log(arrAdd);
                    }
                }
            }
            reg = ''
        }

        tibbleBox.innerHTML = arr.map((item) => {
            return `<div class="nameTibbleBox">
                <div class="nameTibble">${item[0]}</div>
                <div class="nameTibble">${item[1]}</div>
                <div class="nameTibble">${item[2]}</div>
            </div>`

        }).join('')
        return arr
    } catch (error) {
        console.error(error);
    }
}

getTibbleData().then()


