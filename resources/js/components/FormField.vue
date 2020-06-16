<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type="text"
                class="w-full form-control form-input form-input-bordered rtl"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
            />
        </template>
    </default-field>
</template>

<script>
import _ from 'lodash';
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {

    data() {
        return {
            sample: {
                "ބާ": "baa",
                "ބަ": "ba",
                "ބީ": "bee",
                "ބޭ": "bey",
                "ބެ": "be",
                "ބި": "bi",
                "ބޯ": "boa",
                "ބޫ": "boo",
                "ބޮ": "bo",
                "ބު": "bu",
                "ބް": "b",
                "ޗާ": "chaa",
                "ޗަ": "cha",
                "ޗީ": "chee",
                "ޗި": "che",
                "ޗޭ": "chey",
                "ޗެ": "che",
                "ޗޫ": "choo",
                "ޗޯ": "choa",
                "ޗޮ": "cho",
                "ޗު": "chu",
                "ޗް": "ch",
                "ޑާ": "daa",
                "ޑަ": "da",
                "ޑި": "di",
                "ޑީ": "dee",
                "ޑެ": "de",
                "ޑޭ": "dey",
                "ޑޮ": "do",
                "ޑޯ": "doa",
                "ޑު": "du",
                "ޑޫ": "doo",
                "ޑް": "d",
                "ދާ": "dhaa",
                "ދަ": "dha",
                "ދި": "dhi",
                "ދޫ": "dhuu",
                "ދު": "dhu",
                "ދޯ": "dhoa",
                "ދޮ": "dho",
                "ދް": "dh",
                "ފާ": "faa",
                "ފަ": "fa",
                "ފީ": "fee",
                "ފެ": "fe",
                "ފޫ": "fuu",
                "ފު": "fu",
                "ފި": "fi",
                "ފޯ": "foa",
                "ފޮ": "fo",
                "ފް": "f",
                "ގާ": "gaa",
                "ގަ": "ga",
                "ގީ": "gee",
                "ގެ": "ge",
                "ގޭ": "gey",
                "ގޫ": "guu",
                "ގު": "gu",
                "ގޯ": "goa",
                "ގޮ": "go",
                "ގް": "g",
                "ހާ": "haa",
                "ހަ": "ha",
                "ހި": "hi",
                "ހީ": "hee",
                "ހޭ": "hey",
                "ހެ": "he",
                "ހޫ": "hoo",
                "ހޯ": "hoa",
                "ހޮ": "ho",
                "ހު": "hu",
                "ހް": "h",
                "ޖާ": "jaa",
                "ޖަ": "ja",
                "ޖި": "ji",
                "ޖީ": "jee",
                "ޖޫ": "juu",
                "ޖު": "ju",
                "ޖޮ": "jo",
                "ޖޯ": "joa",
                "ޖް": "j",
                "ކާ": "kaa",
                "ކަ": "ka",
                "ކީ": "kee",
                "ކެ": "ke",
                "ކޭ": "key",
                "ކު": "ku",
                "ކޫ": "kuu",
                "ކޮ": "ko",
                "ކޯ": "koa",
                "ކް": "k",
                "ލޭ": "ley",
                "ލެ": "le",
                "ލޯ": "loa",
                "ލޮ": "lo",
                "ލި": "li",
                "ލޫ": "luu",
                "ލު": "lu",
                "ލް": "l",
                "ޅާ": "lhaa",
                "ޅަ": "lha",
                "ޅީ": "lhee",
                "ޅެ": "lhe",
                "ޅޭ": "lhey",
                "ޅޫ": "lhoo",
                "ޅޯ": "lhoa",
                "ޅޮ": "lho",
                "ޅު": "lhu",
                "ޅް": "lh",
                "މެ": "mey",
                "މީ": "mii",
                "މޫ": "muu",
                "މާ": "maa",
                "މަ": "ma",
                "މޯ": "moa",
                "މޮ": "mo",
                "މި": "mi",
                "މް": "m",
                "ނީ": "ny",
                "ނަ": "na",
                "ނާ": "naa",
                "ނި": "ni",
                "ނެ": "ne",
                "ނޭ": "ney",
                "ނޮ": "no",
                "ނޯ": "noa",
                "ނު": "nu",
                "ނޫ": "noo",
                "ން": "n",
                "ޕީ": "pee",
                "ޕެ": "pe",
                "ޕާ": "paa",
                "ޕަ": "pa",
                "ޕޫ": "puu",
                "ޕޯ": "poa",
                "ޕޭ": "pey",
                "ޕް": "p",
                "ރޭ": "rey",
                "ރާ": "raa",
                "ރަ": "ra",
                "ރި": "ri",
                "ރު": "ru",
                "ރޯ": "roa",
                "ރޮ": "ro",
                "ރީ": "ree",
                "ސީ": "see",
                "ސާ": "saa",
                "ސޭ": "sey",
                "ސޫ": "suu",
                "ސޯ": "soa",
                "ސަ": "sa",
                "ސު": "su",
                "ސް": "s",
                "ށަ": "sha",
                "ށާ": "shaa",
                "ށި": "shi",
                "ށީ": "shee",
                "ށެ": "she",
                "ށޭ": "shey",
                "ށޮ": "sho",
                "ށޯ": "shoa",
                "ށު": "shu",
                "ށޫ": "shoo",
                "ޓީ": "tee",
                "ޓި": "ti",
                "ޓު": "tu",
                "ޓާ": "taa",
                "ޓަ": "ta",
                "ޓޯ": "toa",
                "ޓޭ": "tey",
                "ޓް": "t",
                "ވޭ": "vey",
                "ވާ": "vaa",
                "ވެ": "ve",
                "ވީ": "vii",
                "ވޫ": "vuu",
                "ވު": "vu",
                "ވް": "v",
                "ޔާ": "yaa",
                "ޔަ": "ya",
                "ޔީ": "yee",
                "ޔޭ": "yey",
                "ޔި": "yi",
                "ޔެ": "ye",
                "ޔޫ": "yoo",
                "ޔޯ": "yoa",
                "ޔޮ": "yo",
                "ޔު": "yu",
                "ޔް": "y",
                "ޒީ": "zee",
                "ޒާ": "zaa",
                "ޒު": "zu",
                "ޒޫ": "zuu",
                "ޒޮ": "zo",
                "ޒޯ": "zoa",
                "ޒް": "z",
                "ތާ": "thaa",
                "ތަ": "tha",
                "ތޭ": "they",
                "ތޫ": "thuu",
                "ތޮ": "tho",
                "ތް": "t",
                "އަ": "a",
                "އާ": "aa",
                "އީ": "ee",
                "އު": "o",
                "އޫ": "oo",
                "އޯ": "oa"
            },
        }
    },
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
        splitWords(value) {
            var ref = this;

            var words = _.split(value, ' ');

            var sentence = [];
            for (let word of Object.values(words)) {
                var latin  = this.translateThaana(word);
                sentence.push(latin);
            }
            this.value = _.join(sentence, ' ')
        },
        translateThaana(word) {
           var ref = this;

            var regex_values = [];
            for (let [key, value] of Object.entries(this.sample)) {
                regex_values.push(key);
            }
            regex_values = _.join(regex_values, '|');

            var final = [];
            var regex = new RegExp("(?:|\\W)" + regex_values + "(?:|\\W)", "g");
            var results = word.match(regex);
            if(results !== null) {
                for (let value of Object.values(results)) {
                    final.push(ref.sample[value])
                }
            }

            var number_regex = new RegExp("(\\d+)", "g");
            var result2 = word.match(number_regex);
            final.push(result2);
            return  _.join(final, '');
        }
    },
    mounted() {
        var ref = this;
        Nova.$on('field-update-' + this.field.attribute, ({value}) => {
            ref.splitWords(value);
        })
    }
}
</script>

<style>
    .rtl{
        direction: rtl;
    }
</style>
