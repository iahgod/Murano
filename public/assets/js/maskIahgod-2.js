// DATA
const data = document.querySelectorAll('.data_input');
for(const item of data) {
  new IMask(item, {
    mask: '00/00/0000'
  });
}
// CPF
const cpf = document.querySelectorAll('.cpf');
for(const item of cpf) {
  new IMask(item, {
    mask: '000.000.000-00'
  });
}
// CNPJ
const cnpj = document.querySelectorAll('.cnpj');
for(const item of cnpj) {
  new IMask(item, {
    mask: '00.000.000/0000-00'
  });
}
// TELEFONE
const telefone = document.querySelectorAll('.telefone');
for(const item of telefone) {
  new IMask(item, {
    mask: '(00) 0000-0000'
  });
}
// CELULAR
const celular = document.querySelectorAll('.celular');
for(const item of celular) {
  new IMask(item, {
    mask: '(00) 9 0000-0000'
  });
}
// LEITO
const leito = document.querySelectorAll('.leito');
for(const item of leito) {
  new IMask(item, {
    mask: '00.00'
  });
}

// PRESSAO ARTERIAL
const pa = document.querySelectorAll('.pa');
for(const item of pa) {
  new IMask(item, {
    mask: '000/000'
  });
}
// FREQUENCIA CARDIACA
const fc = document.querySelectorAll('.fc');
for(const item of fc) {
  new IMask(item, {
    mask: '000'
  });
}
// TEMPERATURA
const temp = document.querySelectorAll('.temp');
for(const item of temp) {
  new IMask(item, {
    mask: '00.0'
  });
}