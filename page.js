let box = document.getElementById('dropDownBoxCountry')
let countrySelectBt = document.getElementById('countrySelectBt')

let regionSelectBt = document.getElementById('regionSelectBt')
let dropDownBoxRegion = document.getElementById('dropDownBoxRegion')

let citySelectBt = document.getElementById('citySelectBt')
let dropDownBoxCity = document.getElementById('dropDownBoxCity')

let inputCountry = document.getElementById('inputCountry')
let inputRegion = document.getElementById('inputRegion')
let inputCity = document.getElementById('inputCity')
let addButton = document.getElementById('addButton')


countrySelectBt.onclick = () => box.style.display = 'block';
regionSelectBt.onclick = () => dropDownBoxRegion.style.display = 'block';
citySelectBt.onclick = () => dropDownBoxCity.style.display = 'block';
addButton.onclick = () => addTibbleItem(inputCountry, inputRegion, inputCity)


async function fetchData() {

    try {
        const response = await fetch('http://php/PhpstormProjects/createSite/DB/testDB.php');
        const data = await response.json();
        box.innerHTML = data.map((item) => {
            return `<div id="dropDownBoxItem" 
                         class="dropDownBoxItem"  
                         onclick="getRegion(${item['id']},'${item.country}')">
                        ${item.country}
                    </div>`
        }).join('')
    } catch
        (error) {
        console.error(error);
    }
}

fetchData().then()


function getRegion(id, name = '') {
    $.ajax({
        url: 'http://php/PhpstormProjects/createSite/DB/getRegion.php',
        type: "POST",
        dataType: "html",
        data: {
            id: id
        },
        success: function (data) {
            box.style.display = 'none'
            data = JSON.parse(data)
            if (name != '') {
                countrySelectBt.value = name
                regionSelectBt.value = 'Select Region'
                citySelectBt.value = 'Select Region'
                dropDownBoxRegion.style.display = 'none'
                dropDownBoxCity.style.display = 'none'
                inputCountry.value=name
                inputRegion.value=''
                inputCity.value=''

            }
            if (data.length > 0) {
                let boxItem = data.map((item) => {
                    return `<div id="dropDownBoxItem" class="dropDownBoxItem"  onclick="getCity(${item.regionId},'${item.region}')"> ${item.region}</div>`
                })
                dropDownBoxRegion.innerHTML = boxItem.join('')
            }
        }
    });
}


function getCity(id, name = '') {
    $.ajax({
        url: 'http://php/PhpstormProjects/createSite/DB/getCity.php',
        type: "POST",
        dataType: "html",
        data: {
            id: id
        },
        success: function (data) {
            if (name != '') {
                regionSelectBt.value = name
                citySelectBt.value = 'Select Region'
                inputRegion.value=name
                dropDownBoxRegion.style.display = 'none'
                dropDownBoxCity.style.display = 'none'
                inputCity.value=''
            }
            data = JSON.parse(data)
            // console.log(data)
            if (data.length > 0) {
                let boxItem = data.map((item) => {
                    return `<div id="dropDownBoxItem" class="dropDownBoxItem"  onclick="closeCity('${item.city}')">${item.city}</div>`
                })
                dropDownBoxCity.innerHTML = boxItem.join('')
            }
        }
    });
}

function closeCity(name = '') {
    if (name != '') {
        citySelectBt.value = name
        inputCity.value=name

        dropDownBoxCity.style.display = 'none'
    }
}

async function addTibbleItem(inputCountry, inputRegion, inputCity) {
    if (inputCountry.value !== '' && inputRegion.value !== '' && inputCity.value !== '') {
        // console.log(typeof inputCountry.value, inputRegion.value, inputCity.value)

        const responseCountry = await fetch('http://php/PhpstormProjects/createSite/DB/testDB.php');
        const responseRegion = await fetch('http://php/PhpstormProjects/createSite/DB/getRegion.php');
        const responseCity = await fetch('http://php/PhpstormProjects/createSite/DB/getCity.php');
        const dataCountry = await responseCountry.json();
        const dataRegion = await responseRegion.json();
        const dataCity = await responseCity.json();

        let isCountry = false
        let isRegion = false
        let isCity = false

        let countryId = 0
        let countryIdMax = 0
        let regionId = 0
        let regionIdMax = 0
        let cityId = 0

        for (let i = 0; i < dataCountry.length; i++) {
            if (dataCountry[i].country === inputCountry.value) {
                isCountry = true
                countryId = dataCountry[i].id
                break
            } else if (dataCountry[i].id > countryIdMax) {
                countryIdMax = dataCountry[i].id
            }
        }

        for (let i = 0; i < dataRegion.length; i++) {
            if (dataRegion[i].region === inputRegion.value) {
                isRegion = true
                regionId = dataRegion[i].regionId
                break
            } else if (dataRegion[i].regionId > regionIdMax) {
                regionIdMax = dataRegion[i].regionId
            }
        }

        for (let i = 0; i < dataCity.length; i++) {
            if (dataCity[i].city === inputCity.value) {
                isCity = true
                cityId=dataCity[i].id
                break
            }
        }
        if (isCountry && isRegion && isCity) {
            return alert('Error:   ka tox')
        }

        if (countryId === 0) {
            $.ajax({
                url: 'http://php/PhpstormProjects/createSite/DB/addCountry.php',
                type: "POST",
                dataType: "html",
                data: {
                    country: inputCountry.value
                },
                success: function (data) {
                    // data = JSON.parse(data)
                    console.log('data okk', data)
                    // getTibbleData().then(i=>console.log(i))
                }
            });
        }

        if (regionId === 0) {
            $.ajax({
                url: 'http://php/PhpstormProjects/createSite/DB/addRegion.php',
                type: "POST",
                dataType: "html",
                data: {
                    countryId: countryId === 0 ? +countryIdMax + 1 : countryId,
                    region: inputRegion.value
                },
                success: function (data) {
                    // data = JSON.parse(data)
                    console.log('data okk', data)
                    // getTibbleData().then(i=>console.log(i))
                }
            });
        }

        if (cityId === 0) {
            $.ajax({
                url: 'http://php/PhpstormProjects/createSite/DB/addCity.php',
                type: "POST",
                dataType: "html",
                data: {
                    regionId:regionId === 0 ? +regionIdMax + 1 : regionId,
                    city: inputCity.value
                },
                success: function (data) {
                    // data = JSON.parse(data)
                    console.log('data okk', data)
                }
            });
        }

        inputCountry.value = ''
        inputRegion.value = ''
        inputCity.value = ''
        location.reload()

    } else {
        alert('Please add all')
    }


}

