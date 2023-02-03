import config from "./config.js";
import {createRow, createTable} from "./functions.js";

document.addEventListener('DOMContentLoaded', function () {
    const $app = document.getElementById('app');

    let linksContainer = document.querySelector('.links');
    let links = document.querySelectorAll('a');

    Array.from(links).forEach(bindListener);

    function bindListener(el) {
        if (el && el.parentElement === linksContainer) {

            el.addEventListener('click', async function (event) {

                event.preventDefault();

                try {
                    const endpoint = config.endpoint + el.getAttribute('data-href');

                    const {data: json} = await axios.get(endpoint);
                    const table = createTable($app)

                    Object.entries(json).forEach(([day, temp]) => {
                        const row = createRow(day, temp);
                        table.append(row);
                    });

                    $app.replaceChildren(table);
                } catch (e) {
                    console.log(e)
                }
            })
        }
    }
})