async function fetchDB() {
  try {
    const response = await fetch('./dbTest.php');
    if (!response.ok) {
      throw new Error('데이터를 가져올 수 없습니다.');
    }
    const data = await response.json();
    let datas = '<ul>';
    data.forEach(db => {
      for (key in db) {
        if (key === 'nickname') {
          console.log(db[key]);
          datas += `<li>${db[key]}</li>`;
        }
      }
    });
    datas += '</ul>';

    console.log(document.querySelector('#nickname'));
    document.querySelector('#nickname').innerHTML = datas;
  } catch (error) {
    console.error(`fetch error : ${error}`);
  }
}
