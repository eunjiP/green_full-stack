const lee = {name: 'Lee'};
const kim = {name: 'Kim'};

const map = new Map([[lee, 'developer'], [kim, 'designer']]);

//forEach(요소값, 요소키, map자체)
map.forEach((v, k, map) => console.log(v, k, map));