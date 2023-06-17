tela index: 
listagem com:
- funcionário que vendeu
- cliente que comprou
- data da venda
- valor
- lista com nome do produto (similar a autores no crud)
- opçao de detalhes (ir pra tela com detalhes de categoria de cada produto, quantidade, valor)
- opção de editar
- opção de del



# Tables:
## sales
- sale_id
- employee_id
- custumer_id
- sale_date
- sale_value

`com estes dados, é possível utilizar o sell_id para consultar na tabela sell_product`

## sale_product
- sale_id
- product_id
- quantity

## produtcs
- product_id
- product_name
- product_category
- product_price

## employees
- employee_id
- employee_name

## custumers
- custumer_id
- custumer_name