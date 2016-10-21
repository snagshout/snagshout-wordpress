<?php

/**
 * Copyright 2016 Seller Labs LLC
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.min.js"></script>
<script type="text/javascript">
  (function () {
    var CouponButton = React.createClass({
      getInitialState: function() {
        return {
          active: false,
        };
      },

      render: function () {
        if (this.state.active) {
          return React.createElement(
            'div',
            { className: 'ss-promocode ss-fade-in' },
            this.props.promoCode
          );
        }

        return React.createElement(
          'button',
          {
            type: 'button',
            className: 'ss-expand',
            onClick: this.handleButtonClick,
          },
          'Get Coupon Code'
        );
      },

      handleButtonClick: function () {
        this.setState({ active: true });
      },

      propTypes: {
        couponCode: React.PropTypes.string,
      }
    });

    function makeAndMountButton (element) {
      var promoCode = element.attributes.getNamedItem('data-promo-code').value;

      ReactDOM.render(
        React.createElement(CouponButton, { promoCode: promoCode }),
        element
      );
    };

    Array.prototype.forEach.call(
      document.getElementsByClassName('ss-coupon-button'),
      makeAndMountButton
    );
  })();
</script>
