<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorSpec extends ObjectBehavior
{
    public function it_should_have_isValid_method()
    {
        $this->shouldHaveIsValidMethod();
    }

    public function it_should_return_true_if_string_is_valid()
    {
        $this->isValid('a', 'S')->shouldBe(true);
    }

    public function it_should_return_false_if_string_is_not_valid()
    {
        $this->isValid(4, 'S')->shouldBe(false);
    }

    public function it_should_return_true_if_int_is_valid()
    {
        $this->isValid(2, 'I')->shouldBe(true);
    }

    public function it_should_return_false_if_int_is_not_valid()
    {
        $this->isValid('3', 'I')->shouldBe(false);
    }

    public function it_should_return_true_for_strings_with_length_eq_8()
    {
        $this->isValid('aaaaaaaa', 'S', 8)->shouldBe(true);
        $this->isValid('aaaaaaaaa', 'S', 8)->shouldBe(false);
    }

    public function it_should_return_true_for_ints_with_length_eq_3()
    {
        $this->isValid(234, 'I', 3)->shouldBe(true);
        $this->isValid(23, 'I', 3)->shouldBe(false);
    }

    public function it_should_apply_the_length_validation_only_when_an_integer_is_passed_as_a_third_parameter()
    {
        $this->isValid('aaaaaaaa', 'S', 0)->shouldBe(false);
    }

    public function getMatchers()
    {
        return [
            'haveIsValidMethod' => function($subject) {
                return method_exists($subject, 'isValid');
            }
        ];
    }
}
