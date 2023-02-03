export function createTable(json) {
    const table = document.createElement('table');
    const th1 = document.createElement('th');
    const th2 = document.createElement('th');
    const th3 = document.createElement('th');

    th1.innerText = 'date';
    th2.innerText = 'avg_temp';
    th3.innerText = 'avg_rolling';

    table.append(th1);
    table.append(th2);
    table.append(th3);

    Object.values(json).forEach(appendRows);

    function appendRows(line) {
        const {
            day,
            avg_temp: avgTemp,
            avg_rolling: avgRolling
        } = line;

        const row = createRow(day, avgTemp, avgRolling);
        table.append(row);
    }

    return table;
}

export function createRow(date, avgTemp, avgRolling) {
    const tr = document.createElement('tr');
    const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');

    td1.innerText = date;
    td2.innerText = avgTemp;
    td3.innerText = avgRolling || 'null';

    tr.append(td1);
    tr.append(td2);
    tr.append(td3);

    return tr;
}