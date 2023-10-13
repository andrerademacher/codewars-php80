<?php

declare(strict_types=1);

namespace Kata\VigenereCypher;

/**
 * Implements the Vigenère cipher.
 * @see https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
 */
final class VigenèreCipher
{
    private array $vigenereTable = [];

    public function __construct(private string $password, private string $alphabet)
    {
        $elements = str_split($this->alphabet);
        $elementStack = $elements;
        foreach ($elements as $element) {
            $this->vigenereTable[$element] = array_combine($elements, $elementStack);
            $elementStack[] = array_shift($elementStack);
        }
    }

    /**
     * Returns a new encrypted message from the clear text using the given password and alphabet.
     */
    public function encode(string $clearText): string
    {
        $paddedPasswordRunes = str_split(str_pad('', mb_strlen($clearText), $this->password));
        $encoded = [];
        foreach (str_split($clearText) as $index => $clearTextRune) {
            $encoded[] = $this->vigenereTable[$clearTextRune][$paddedPasswordRunes[$index]] ?? $clearTextRune;
        }
        return implode($encoded);
    }

    /**
     * Returns the clear text again from the encoded text using the password and the given alphabet.
     *
     */
    public function decode(string $encodedText): string
    {
        $paddedPasswordRunes = str_split(str_pad('', mb_strlen($encodedText), $this->password));
        $decoded = [];
        foreach (str_split($encodedText) as $index => $encodedTextRune) {
            $column = $this->vigenereTable[$paddedPasswordRunes[$index]];
            $decoded[] = array_search($encodedTextRune, $column) ?: $encodedTextRune;
        }
        return implode($decoded);
    }
}