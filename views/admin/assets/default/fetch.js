const data_fetch = (url = 'post/view', b = '#view') =>{
    fetch(url)
    .then(req => req.text()
    .then(res => qs(b).innerHTML = res))
    .catch(err => qs(b).innerHTML = 'ERROR');
}
