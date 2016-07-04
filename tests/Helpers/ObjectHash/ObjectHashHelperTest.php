<?php
namespace Tests\Helpers\ObjectHash;

use Helpers\ObjectHash\ObjectHashHelper;

class ObjectHashHelperTest extends \PHPUnit_Framework_TestCase
{
    protected $tester;

    public function setUp()
    {
        $tester = new \stdClass();
        $tester->property1 = time();
        $tester->propertyExcept = pow(rand(1, 10), $tester->property1);

        $this->tester = $tester;
    }

    /**
     * @param $hashFunction
     * @param $except
     * @dataProvider dataProvider_ValidHashFunctions
     */
    public function testCalculateHash($hashFunction, $except = [])
    {
        $converted = new \stdClass();

        foreach ($this->tester as $property => $value)
        {
            if (in_array($property, $except)) {
                continue;
            }

            $converted->$property = $value;
        }

        $originalHash = call_user_func($hashFunction, serialize($converted));

        $tester = new ObjectHashHelper($hashFunction);

        $this->assertEquals(
            $originalHash,
            $calculatedHash = $tester->calculateHash($this->tester, $except),
            sprintf(
                "Calculated hash=%s doesn't match with expected hash=%s",
                $calculatedHash,
                $originalHash
            )
        );

    }

    public function dataProvider_ValidHashFunctions()
    {
        return [
            [ 'md5',  [] ],
            [ 'md5',  [ 'property1'] ],
            [ 'md5',  [ 'property1', 'property2'] ],
            [ 'md5',  [ 'property2'] ],
            [ 'sha1', [] ],
            [ 'sha1', [ 'property1'] ],
            [ 'sha1', [ 'property1', 'property2'] ],
            [ 'sha1', [ 'property2'] ],
        ];
    }

    public function testCalculateHash_ThrowException()
    {
        $fakeHashFunction = uniqid();

        $tester = new ObjectHashHelper($fakeHashFunction);

        try {
            $tester->calculateHash($this->tester);
        } catch (\RuntimeException $ex) {
            $this->assertEquals(
                sprintf(
                    ObjectHashHelper::EXCEPT_MESSAGE,
                    (new \ReflectionClass($this->tester))->getShortName(),
                    $fakeHashFunction
                ),
                $ex->getMessage()
            );

            return true;
        }

        $this->assertFalse(true, "Exception in tester class ObjectHashHelper not called");
    }
}
