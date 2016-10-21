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
