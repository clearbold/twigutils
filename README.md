# twigutils
Craft CMS plugin containing numerous functions we find useful in Twig.

#### httpify

```
<a href="{{ entry.fieldContainingUrl|httpify }}">{{ entry.fieldContainingUrl }}</a>
```

Allows content editors to enter `www.clearbold.com` in a single-line text field, where that string is output as content, and `httpify` adds the `http://` protocol for linking. Does not alter the string if it already contains `http://`.

#### traditionalusphone

```
{{ entry.fieldContainingPhoneNumber|traditionalusphone }}
```

Allows content editors to enter phone numbers as `+15556667777` for `tel://` links, and formats the phone number for display as `(555) 666-777`.

#### dotusphone

```
{{ entry.fieldContainingPhoneNumber|dotusphone }}}
```

Same as previous, but outputs phone number as `555.666.7777`.

#### toc

Generates a table of contents.

```
{{ entry.body|toc }}
```

If your Rich Text field contains content such as the following:

```
<h3 id="firstheading">First Heading</h3>
<p>Some text.</p>
<h3 id="secondheading">Second Heading</h3>
```

`toc` will output the following:

```
<div class="well toc">
    <ul class="ul-toc">
        <li><a href="#firstheading">First Heading</a></li>
        <li><a href="#secondheading">Second Heading</a></li>
    </ul>
</div>
<h3 id="firstheading">First Heading</h3>
<p>Some text.</p>
<h3 id="secondheading">Second Heading</h3>
```
