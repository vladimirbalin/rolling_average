export function createTable() {
    const table = document.createElement('table');
    const th1 = document.createElement('th');
    const th2 = document.createElement('th');

    th1.innerText = 'date';
    th2.innerText = 'temp';

    table.append(th1);
    table.append(th2);

    return table;
}

export function createRow(date, temp) {
    const tr = document.createElement('tr');
    const td1 = document.createElement('td');
    const td2 = document.createElement('td');

    td1.innerText = date;
    td2.innerText = temp || 'null';

    tr.append(td1);
    tr.append(td2);

    return tr;
}