<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
            />
        </template>
<!--        <div class="latin-fields-wrapper">-->
<!--            <template  v-for="(value, name, index) in words">-->
<!--                <input-->
<!--                    :id="field.name"-->
<!--                    type="text"-->
<!--                    class="form-control form-input form-input-bordered" :style="adjustWidth(value)"-->
<!--                    :class="errorClasses"-->
<!--                    :placeholder="field.name"-->
<!--                    v-model="words[index]"-->
<!--                />-->
<!--            </template>-->
<!--        </div>-->
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
                "ބި": "bi",
                "ބޭ": "bey",
                "ބެ": "be",
                "ބޫ": "boo",
                "ބު": "bu",
                "ބޯ": "boa",
                "ބޮ": "bo",
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
                "ޑީ": "dee",
                "ޑި": "di",
                "ޑޭ": "dey",
                "ޑެ": "de",
                "ޑޮ": "do",
                "ޑޯ": "doa",
                "ޑޫ": "doo",
                "ޑު": "du",
                "ޑް": "d",
                "ދާ": "dhaa",
                "ދަ": "dha",
                "ދީ": "dhee",
                "ދި": "dhi",
                "ދޫ": "dhoo",
                "ދު": "dhu",
                "ދޭ": "dhey",
                "ދެ": "dhe",
                "ދޯ": "dhoa",
                "ދޮ": "dho",
                "ދް": "dh",
                "ފާ": "faa",
                "ފަ": "fa",
                "ފީ": "fee",
                "ފި": "fi",
                "ފޭ": "fey",
                "ފެ": "fe",
                "ފޫ": "foo",
                "ފު": "fu",
                "ފޯ": "foa",
                "ފޮ": "fo",
                "ފް": "f",
                "ގާ": "gaa",
                "ގަ": "ga",
                "ގީ": "gee",
                "ގޭ": "gey",
                "ގެ": "ge",
                "ގޫ": "goo",
                "ގު": "gu",
                "ގޯ": "goa",
                "ގޮ": "go",
                "ގް": "g",
                "ހާ": "haa",
                "ހަ": "ha",
                "ހީ": "hee",
                "ހި": "hi",
                "ހޭ": "hey",
                "ހެ": "he",
                "ހޫ": "hoo",
                "ހު": "hu",
                "ހޯ": "hoa",
                "ހޮ": "ho",
                "ހް": "h",
                "ޖާ": "jaa",
                "ޖަ": "ja",
                "ޖީ": "jee",
                "ޖި": "ji",
                "ޖޫ": "joo",
                "ޖު": "ju",
                "ޖޭ": "jey",
                "ޖެ": "je",
                "ޖޮ": "jo",
                "ޖޯ": "joa",
                "ޖް": "j",
                "ކާ": "kaa",
                "ކަ": "ka",
                "ކީ": "kee",
                "ކޭ": "key",
                "ކެ": "ke",
                "ކޫ": "koo",
                "ކު": "ku",
                "ކޮ": "ko",
                "ކޯ": "koa",
                "ކް": "k",
                "ލާ": "laa",
                "ލަ": "la",
                "ލޭ": "ley",
                "ލެ": "le",
                "ލޯ": "loa",
                "ލޮ": "lo",
                "ލީ": "lee",
                "ލި": "li",
                "ލޫ": "loo",
                "ލު": "lu",
                "ލް": "l",
                "ޅާ": "lhaa",
                "ޅަ": "lha",
                "ޅީ": "lhee",
                "ޅި": "lhi",
                "ޅެ": "lhe",
                "ޅޭ": "lhey",
                "ޅޫ": "lhoo",
                "ޅޯ": "lhoa",
                "ޅޮ": "lho",
                "ޅު": "lhu",
                "ޅް": "lh",
                "މާ": "maa",
                "މަ": "ma",
                "މޭ": "mey",
                "މެ": "me",
                "މީ": "mee",
                "މި": "mi",
                "މޫ": "moo",
                "މޯ": "moa",
                "މު": "mu",
                "މޮ": "mo",
                "މް": "m",
                "ނާ": "naa",
                "ނަ": "na",
                "ނީ": "nee",
                "ނި": "ni",
                "ނޭ": "ney",
                "ނެ": "ne",
                "ނޮ": "no",
                "ނޯ": "noa",
                "ނޫ": "noo",
                "ނު": "nu",
                "ން": "n",
                "ޕީ": "pee",
                "ޕި": "pi",
                "ޕޭ": "pey",
                "ޕެ": "pe",
                "ޕާ": "paa",
                "ޕަ": "pa",
                "ޕޫ": "poo",
                "ޕު": "pu",
                "ޕޯ": "poa",
                "ޕް": "p",
                "ރޭ": "rey",
                "ރެ": "re",
                "ރާ": "raa",
                "ރަ": "ra",
                "ރީ": "ree",
                "ރި": "ri",
                "ރޫ": "roo",
                "ރު": "ru",
                "ރޯ": "roa",
                "ރޮ": "ro",
                "ރް": "r",
                "ސީ": "see",
                "ސި": "si",
                "ސާ": "saa",
                "ސަ": "sa",
                "ސޭ": "sey",
                "ސެ": "se",
                "ސޫ": "soo",
                "ސު": "su",
                "ސޯ": "soa",
                "ސޮ": "so",
                "ސް": "s",
                "ށާ": "shaa",
                "ށަ": "sha",
                "ށީ": "shee",
                "ށި": "shi",
                "ށޭ": "shey",
                "ށެ": "she",
                "ށޮ": "sho",
                "ށޯ": "shoa",
                "ށޫ": "shoo",
                "ށު": "shu",
                "ޓީ": "tee",
                "ޓި": "ti",
                "ޓޫ": "too",
                "ޓު": "tu",
                "ޓާ": "taa",
                "ޓަ": "ta",
                "ޓޮ": "to",
                "ޓޯ": "toa",
                "ޓޭ": "tey",
                "ޓެ": "te",
                "ޓް": "t",
                "ވޭ": "vey",
                "ވާ": "vaa",
                "ވަ": "va",
                "ވެ": "ve",
                "ވީ": "vee",
                "ވި": "vi",
                "ވޫ": "voo",
                "ވު": "vu",
                "ވޯ": "voa",
                "ވޮ": "vo",
                "ވް": "v",
                "ޔާ": "yaa",
                "ޔަ": "ya",
                "ޔީ": "yee",
                "ޔި": "yi",
                "ޔޭ": "yey",
                "ޔެ": "ye",
                "ޔޫ": "yoo",
                "ޔު": "yu",
                "ޔޯ": "yoa",
                "ޔޮ": "yo",
                "ޔް": "y",
                "ޒީ": "zee",
                "ޒި": "zi",
                "ޒާ": "zaa",
                "ޒަ": "za",
                "ޒޫ": "zoo",
                "ޒު": "zu",
                "ޒޭ": "zey",
                "ޒެ": "ze",
                "ޒޮ": "zo",
                "ޒޯ": "zoa",
                "ޒް": "z",
                "ތާ": "thaa",
                "ތަ": "tha",
                "ތޭ": "they",
                "ތެ": "the",
                "ތީ": "thee",
                "ތި": "thi",
                "ތޫ": "thoo",
                "ތު": "thu",
                "ތޯ": "thoa",
                "ތޮ": "tho",
                "ތް": "t",
                "އާ": "aa",
                "އަ": "a",
                "އީ": "ee",
                "އި": "i",
                "އޫ": "oo",
                "އު": "o",
                "އޯ": "oa",
                "އޮ": "o"
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
