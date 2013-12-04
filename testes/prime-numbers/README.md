Prime Numbers
============

O Problema
----------
Dado um numero inicial e final, trazer em lista ordenada todos os numeros primos entre eles.

Números primos são os números naturais que têm apenas dois divisores diferentes: o 1 e ele mesmo.

Exemplos:  

* 2 tem apenas os divisores 1 e 2, portanto 2 é um número primo.  
* 17 tem apenas os divisores 1 e 17, portanto 17 é um número primo.  
* 10 tem os divisores 1, 2, 5 e 10, portanto 10 não é um número primo.

Observações:  
=> 1 não é um número primo, porque ele tem apenas um divisor que é ele mesmo.  
=> 2 é o único número primo que é par.   

Os números que têm mais de dois divisores são chamados números compostos.  
Exemplo: 15 tem mais de dois divisores => 15 é um número composto.


*Atenção: O algoritmo de ordenação faz parte da solução do problema, não pode ser utilizada funcões da linguagem para realiza-la*

Exemplos:
---------
* 
 **Entrada:** De: 0 até 50  
 **Resultado:**  
 ```
 [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47]
 ```

* 
 **Entrada:** De: 0 até 100  
 **Resultado:**  
 ```  
 [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97]
 ```
 
* 
 **Entrada:** De -20 até 100  
 **Resultado:** *throw InvalidArgumentException*

* 
  **Entrada:** NULL
  **Resultado:** [Empty Set]

