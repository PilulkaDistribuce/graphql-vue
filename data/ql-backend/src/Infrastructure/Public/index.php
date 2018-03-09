<?php

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Validator\DocumentValidator;
use GraphQL\Validator\Rules\QueryComplexity;
use GraphQL\Validator\Rules\QueryDepth;
use Pilulka\GraphQLPehapkari\Infrastructure\Mapping\TypeFactory;

require_once __DIR__ . '/../../../vendor/autoload.php';

$schema = new Schema([
    'query' => TypeFactory::query()
]);

$rawInput = file_get_contents('php://input');

$input = json_decode($rawInput, true);
$query = $input['query'];


$variableValues = isset($input['variables']) ? $input['variables'] : null;

DocumentValidator::addRule(new QueryComplexity(20));
DocumentValidator::addRule(new QueryDepth(1));

try {
    $rootValue = ['prefix' => 'You said: '];



    $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);
    $output = $result->toArray();





} catch (\Exception $error) {

    $httpStatus = 500;
    $debug = true;
    $output['errors'] = [
        FormattedError::createFromException($error, $debug)
    ];
}


echo json_encode($output);